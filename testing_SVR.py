# -*- coding: utf-8 -*-
"""
Created on Thu Aug 16 02:37:28 2018

@author: USER
"""

import training_SVR as tr
import numpy as np

# count distance for all data
data_normal = list(tr.dataTraining)
for data in tr.dataTesting:
    data_normal.append(data)
jarak_all = tr.get_dist(data_normal)

# slice distance for data testing
jarak_testing = jarak_all[len(tr.dataTraining):,:len(tr.dataTraining)]

# calculate the value of kernel RBF for data testing
kernel_testing = tr.get_kernel_rbf(jarak_testing,0.7)

# calculate hessian matrix for data testing
hessian_testing = tr.get_hessian(kernel_testing, 0.1)

# count y prediction for data testing
y_pred_test = [0.0] * len(tr.dataTesting)
for i in range(len(y_pred_test)):
    y_pred_test[i] = np.sum([H*(alp_s - alp) for H,alp_s,alp in zip(hessian_testing[i],tr.alpha_star,tr.alpha)])

# denormalization from y prediction
y_denorm_test = np.zeros_like(y_pred_test)
for i in range(len(y_pred_test)):
    y_denorm_test[i] = y_pred_test[i] * (tr.max_data-tr.min_data) + tr.min_data

print(y_denorm_test)