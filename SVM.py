# -*- coding: utf-8 -*-
"""
Created on Sun Aug 05 21:40:15 2018

@author: USER
"""
import numpy as np
import sys
sys.stdout.write('.')
sys.stdout.flush()

y = [-1, -1, -1, 1, 1, 1]
print(len(y))
alpha = []
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
                    print(str(depth) + ", " + str(alpha_i) + ", " + str(t_a))
            
            assignAlpha(t_alpha, depth + 1)
            

assignAlpha([], 0)
#print(alpha)
