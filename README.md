# Automated Essay Grading System 
by neha and priya

The project aims to build an automated essay scoring system using a data set of 16173
essays from kaggle.com. The essay set contained of 8 different types of essays based on
different contexts. We extracted features such as total word count per essay, removed
Stopwords, word Lemmatizer, etc from the training set essays. We used RNN for
defining layers and XGBClassifier model to learn from these features and generate
parameters for testing and validation. We used Bi-directional LSTM for better model
performance. Further, we performed testing on dataset for 3 times each time dropping
different parameters for better accuracy. The Grading style used 4 parameters i.e. worst,
average, above average, excellent for grading essays based on clarity and coherence.
Categorical encoders were used for encoding these categorical parameters into numeric
values. Sequence matrix was used convert tokenized text of max length 50 into matrix.
We get an array of four values which are nothing but probability scores for values from 0
to 3 and the highest value is considered as graded score for the particular essay.




![System Architechture](https://github.com/[Prrriyanka]/[Machine_learning]/blob/[Master]/Capture.PNG?raw=true)
