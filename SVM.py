# -*- coding: utf-8 -*-
"""
Created on Sun Aug 05 21:40:15 2018

@author: USER
"""
import numpy as np
import sys
sys.stdout.write('.')
sys.stdout.flush()

y = [-1, -1, 1, 1]
x = [(7,17),(10,16),(9,22),(16,18)]
print(len(y))
alpha = []
L_value = []
alpha_value = np.arange(0,3,0.1)

# method assignAlpha for search all of possible value of alpha
def assignAlpha(temp_alpha, depth):
    if (depth < len(y)):
        t_alpha = list(temp_alpha)
        t_alpha.append(0)
        
        for alpha_i in alpha_value:            
            t_alpha[len(t_alpha)-1] = alpha_i
            if (depth == (len(y) - 1)):
                t_a = list(t_alpha)                
                #requirement for alpha (alpha . y = 0)
                if (np.dot(t_a,y) == 0):
                    alpha.append(t_a)
                    sumL = 0
                    for i in range(len(x)):
                        for j in range(len(x)):
                            sumL += t_a[i] * t_a[j] * y[i] * y[j] * ((x[i][0] * x[j][0]) + (x[i][1] * x[j][1]))
                    #if (sumL > max_L):
                        #max_L = sumL
                        #max_alpha = t_a
                    a = sum(t_a)
                    t_a.append(a - 0.5*sumL)
                    #L_value.append(sumL)
                    print(str(depth) + ", " + str(alpha_i) + ", " + str(t_a))
            
            assignAlpha(t_alpha, depth + 1)

def findMaxL():
    max_L = -999
    max_alpha = []
    for i in range(len(alpha)):
        if (alpha[i][len(alpha[i]) - 1] > max_L):
            max_L = alpha[i][len(alpha[i]) - 1]
            max_alpha = alpha[i]
    return max_L,max_alpha


assignAlpha([], 0)
print("")
print(findMaxL())
#print(alpha)
