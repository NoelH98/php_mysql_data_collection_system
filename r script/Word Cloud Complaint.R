#Importing text data into R
#To import text data in R, use readLines('filepath/filename.txt') as shown below

text = readLines("text/complaints.txt")

#First install R packages below and then load using library as shown.

library("tm")
library("SnowballC")
library("wordcloud")

#change document into Corpus

docs <- Corpus(VectorSource(text))
docs

#Beginning of text cleaning 

toSpace <- content_transformer(function(x,pattern)gsub(pattern,"",x))
docs <- tm_map(docs,toSpace,"/")

#Convert the text to lower case

docs <- tm_map(docs,content_transformer(tolower))

#Remove numbers

docs <- tm_map(docs,removeNumbers)

#Remove english common stopwords

docs <- tm_map(docs,removeWords,stopwords("english"))

#To remove your own stop word
#specify your stopwords as a character vector

docs <- tm_map(docs,removeWords,c("blabla1","blabla2"))

#Remove punctuations

docs <- tm_map(docs,removePunctuation)

#Eliminate extra white spaces

docs <- tm_map(docs,stripWhitespace)

#End of text cleaning

dtm <- TermDocumentMatrix(docs)
dtm

#To transpose this matrix;Use dtm <- DocumentTermMatrix(docs)


m <- as.matrix(dtm)
v <- sort(rowSums(m),decreasing=TRUE)
d <- data.frame(word = names(v),freq=v)

#T view the first ten words with their frequencies

head(d,10)

#Drawing wordcloud

set.seed(5678)
png(filename = "images/cloud_complaints.png",width = 500, height = 500)
wordcloud(words = d$word, freq = d$freq, min.freq = 1, max.words= 100, random.order = FALSE,
          rot.per=0.35,colors = brewer.pal(8,"Dark2"))

#word association
findAssocs(dtm,terms="day",corlimit=0.7)

#Frequency Terms
findFreqTerms(dtm,lowfreq=5)

png(filename = "images/temp_complaints.png",width = 500, height = 500)
#Plotting bar graph of word frequencies
barplot(d[1:10,]$freq,las=2,names.arg = d[1:10,]$word,col = "lightblue",main="Most
        Frequent words",ylab="Word Frequencies")

dev.off()

