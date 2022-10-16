#loaading needed libraries

#for breaking the data into manageable pieces
library(plyr)

#for string processing
library(stringr)

#for plotting the results
library(ggplot2)

#importing files
posText <- read.delim(".../positive-words.txt",header=FALSE,stringsAsFactors=FALSE)
posText <- posText$V1
posText <- unlist(lapply(posText,function(x){str_split(x,"\n")}))
negText <- read.delim(".../negative-words.txt",header=FALSE,stringsAsFactors=FALSE)
negText <- negText$V1
negText <- unlist(lapply(negText,function(x){str_split(x,"\n")}))
pos.words = c(posText,'upgrade')
neg.words = c(negText,'wtf','wait','waiting','epicfail','mechanical')

#importing text to be analysed
delta_text = readLines("text/sentimental.txt");

#sentimental analysis
score.sentiment = function(sentences,pos.words,neg.words,.progress='none')
{
#parameters
#sentences;vector of text to score
#pos.words;vector of words of positive sentiment
#neg.words;vector of words of negative sentiment
#.progress;passed to laply()to control of progress bar
scores = laply(sentences,
function(sentence,pos.words,neg.words)
{
#remove punctuation
sentence = gsub("[[:punct:]]","",sentence)
#remove control characters
sentence = gsub("[[:cntrl:]]","",sentence)
#remove digits
sentence = gsub('\\d+','',sentence)
#define error handling
tryTolower = function(x){
y = NA
try_error = tryCatch(tolower(x),error=function(e)e)
if(!inherits(try_error,"error"))
y = tolower(x)
return(y)
}
#use tryToLower
sentence = sapply(sentence,tryTolower)
word.list = str_split(sentence,"\\s+")
words = unlist(word.list)
pos.matches = match(words,pos.words)
neg.matches = match(words,neg.words)
pos.matches = !is.na(pos.matches)
neg.matches = !is.na(neg.matches)
score = sum(pos.matches)- sum(neg.matches)
return(score)
},pos.words,neg.words,.progress=.progress)
scores.df = data.frame(text=sentences,score=scores)
return(scores.df)
}

scores = score.sentiment(delta_text,pos.words,neg.words,.progress='text')
scores$positive <- as.numeric(scores$score > 0)
scores$negative <- as.numeric(scores$score < 0)
scores$neutral <- as.numeric(scores$score == 0)

delta_text$polarity <- ifelse(delta_text$score > 0,"positive",ifelse(delta_text$score < 0,"negative",ifelse(delta_text$score==0,"Neutral",0)))
qplot(factor(score),data=delta_text,geom="bar",fill=factor(polarity))+xlab("Polarity Categories")+ ylab("Frequency")+ ggtitle("Sentimental Analysis")