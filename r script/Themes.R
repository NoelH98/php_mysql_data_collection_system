#loadText mining library
library(tm)

#load topic models library
library(topicmodels)

#set parameters for Gibbs sampling
burnin <- 4000
iter <- 2000
thin <- 500
seed <- list(2003,5,63,100001,765)
nstart <- 5
best <- TRUE

#number of topics
k <- 5

#set working directory(modify path as needed)
setwd("text")

#load files into corpus
#get listing of .txt files in directory
filenames <- list.files(getwd(),pattern="*.txt")

#read files into a character vector
files <- lapply(filenames,readLines)

#create corpus from vector
docs <- Corpus(VectorSource(files))

#inspect a  particular document in corpus
writeLines(as.character(docs[[30]]))

#start preprocessing
#Transform to lower case
docs <- tm_map(docs,content_transformer(tolower))

#remove potentially problematic symbols
toSpace <- content_transformer(function(x,
pattern){return(gsub(pattern,",",x))})
docs <- tm_map(docs, toSpace,"-")
docs <- tm_map(docs, toSpace,"'")
docs <- tm_map(docs, toSpace,"/")
docs <- tm_map(docs, toSpace,".")

#remove punctuation
docs <- tm_map(docs, removePunctuation)

#Strip digits
docs <- tm_map(docs, removeNumbers)

#remove stopwords
docs <- tm_map(docs, removeWords, stopwords("english"))

#remove whitespace
docs <- tm_map(docs,stripWhitespace)

#Good practice to check
writeLines(as.character(docs[[30]]))

#stem document
docs <- tm_map(docs,stemDocument)

#fix up 1 difference btwn us and aussie english and general errors
docs <- tm_map(docs, content_transformer(gsub),pattern="organiz",replacement = "organ")
docs <- tm_map(docs, content_transformer(gsub),pattern="organis",replacement = "organ")
docs <- tm_map(docs, content_transformer(gsub),pattern="andgovern",replacement = "govern")
docs <- tm_map(docs, content_transformer(gsub),pattern="inenterpris",replacement = "enterpris")
docs <- tm_map(docs, content_transformer(gsub),pattern="team-",replacement = "team")

#define and elimante all custom stopwords
myStopwords <- c(
"can","say","one","way","use","also","howev","tell","will","much","need","take","tend","even",
"like","particular","rather","said","get","well","make","ask","come","end","first","two","help",
"often","may","might","see","someth","thing","point","post","look","right","now","think","'ve",
"'re","anoth","put","set","new","good","want","sure","kind","larg","yes","day","etc","quit","sinc",
"attempt","lack","seen","awar","littl","ever","moreov","though","found","abl'","enough","far","earli",
"away","achiev","draw","last","never","brief","bit","entir","brief","great","lot"
)

docs <- tm_map(docs, removeWords, myStopwords)

#inspect a document as a check
writeLines(as.character(docs[[30]]))

#Create document-term matrix
dtm <- DocumentTermMatrix(docs)

#convert rownames to filenames
rownames(dtm) <- filenames

#collapse matrix by summing over columns
freq <- colSums(as.matrix(dtm))

#length should be total number of terms
length(freq)

#create sort order(descending)
ord <- order(freq,decreasing= TRUE)

#List all terms in decreasing order of freq and write to disk
freq[ord]
write.csv(freq[ord],"word_freq.csv")

#Run LDA using Gibbs sampling
ldaOut <- LDA(dtm,k,method="Gibbs",control=list(nstart=nstart,seed=seed,best=best,burnin=burnin,iter=iter,thin=thin))

#write out results
#doccs to topics
ldaOut.topics <- as.matrix(topics(ldaOut))
write.csv(ldaOut.topics,file=paste("LDAGibbs",k,"TopicsToTerms.csv"))

#probabilities associated with each topic assignment
topicProbabilities <- as.data.frame(ldaOut@gamma)
write.csv(topicProbabilities,file=paste("LDAGibbs",k,"TopicProbabilities.csv"))

#Find relative importance of top 2 topics
topic1ToTopic2 <- lapply(1:nrow(dtm),function(x) sort(topicProbabilities[x])[k]/sort(topicProbabilities[x])[k-1])

#Find relative importance of second and third most important topics
topic2ToTopic3 <- lapply(1:nrow(dtm),function(x) sort(topicProbabilities[x])[k-1]/sort(topicProbabilities[x])[k-2])

#write to file
write.csv(topic1ToTopic2,file=paste("LDAGibbs",k,"Topic1ToTopic2.csv"))
write.csv(topic2ToTopic3,file=paste("LDAGibbs",k,"Topic2ToTopic3.csv"))
