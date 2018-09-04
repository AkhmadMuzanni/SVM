# -*- coding: utf-8 -*-
"""
Created on Mon Sep 03 07:41:27 2018

@author: USER
"""

from sklearn.svm import SVR
import numpy as np
import matplotlib.pyplot as plt
import training_SVR as tr

n_samples, n_features = 11, 3
np.random.seed(0)
#y = np.random.randn(n_samples)
y = tr.y
#X = np.random.randn(n_samples, n_features)
X = tr.x_training
X_test = tr.x_testing
clf = SVR(C=1000, cache_size=200, epsilon=0.00001, gamma=2, kernel='rbf', max_iter=10000, shrinking=True, tol=0.0001, verbose=2)
clf.fit(X, y)
y_pred = clf.predict(X)
y_test = clf.predict(X_test)
#print(X) 
#print(y)
y_pred_all = list(y_pred)
y_pred_all.extend(y_test)
#print(X)
#print(y)
#print("")
y_aktual_all = list(tr.y_training)
y_aktual_all.extend(tr.y_testing)
print(y_pred_all)
print("")
print(y_aktual_all)



#print(clf)
#print(y_pred)
#SVR(C=1.0, cache_size=200, coef0=0.0, degree=3, epsilon=0.2, gamma='auto',kernel='rbf', max_iter=-1, shrinking=True, tol=0.001, verbose=False)

tahun = range(2004,2018)

plt.plot(tahun, y_pred_all, color="red", label="Prediksi")
plt.plot(tahun, y_aktual_all, color="green", label="Aktual")
plt.legend()
plt.show()