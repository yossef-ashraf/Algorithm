# typy of algorithem
#1- linear
def linear(L, x):
    for e in L:
        if e == x:
            return True
    return False
# linear([5, 'g'], 5)
# ---------------------
#2- binary
def binary(L, x):
    if len(L) == 0:
        return False
    else:
        mid = len(L)//2
        if L[mid] == x:
            return True
        elif x < L[mid]:
            return binary(L[:mid], x)
        else:
            return binary(L[mid+1:], x)

####################################################################################################################################################

# calcolit BIG O
# o(1) < o(log(n)) < o(root n) < o(n) < o(nlog(n)) < o(n^2) < o(2^n) < o(n!) < o(n^n)

# for(i=1; i<=2*n;i++)
# big o here is o(n) 
#####################################
# for(i=3; i<=n;i*=2)
# 2^3 = 8 
# i = log2(8) = 3 
# 1 - 2 - 4 - 8 - 16 ....
# big o here is o(log2(n)) 
#####################################
# for(i=1; i<=n;i*=3)
# big o here is o(log3(n)) 
#####################################
# for(i=1; i<=n;i+=2)
# 1-3-5-7-9... (n/2)
# big o here is o(n)
#####################################
# for(i=1; i<=n;i++)
#     for(j=1; j<= 1000 ; j++)
# big o here is o(n) // n+1000n
##################################### 
# for(i=1;i<=n;i++)
#   for(j=1; j<=j+3 ; j++) // 1-2-3
# big o here is o(n) 
##################################### 
# for(i=1;i<=n;i++)
#   for(j=1; j<= n*n ; j+=2)
# big o here is o(n^3) 
##################################### 
# for(i=1;i<=n;i++)
#   for(j=1; j<= n; j*=2)
# big o here is o(nlog2(n)) 
##################################### 
# for(i=1;i<=n;i++)
#   for(j=1; j<= n*n; j*=2)
# n+(n*log2(n^2)) 
# big o here is o(n^2) 

# Storing data in algroithm
# c in rigster
# 3 c in cache
# 100 - 1000 c in ram 
# 10^6 c < in hard 

####################################################################################################################################################

# Sorting Algroithm
def bubbleSort(arr):
    n = len(arr)
    # Traverse through all array elements
    for i in range(n):
        # Last i elements are already in place
        for j in range(0, n - i - 1):
            # Traverse the array from 0 to n-i-1
            # Swap if the element found is greater than the next element
            if arr[j] > arr[j + 1]:
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                # Big O of Bubble sort: O(n^2)
                # Search Algorithm
                # The search algorithm used inside the loop is linear search.
                # So, overall time complexity of this function is O(n * n).
                print("Bubble Sort Function")



















Big-o Cheat Sheet

Big-o       Name        Description        Example

0(1)      Constant Time    Checking if a stack is empty     Execution time remains unchanged irrespective of input data

0(log n)    Logarithmic Time    Complexity increases by one unit for each doubling of input data    Finding an item in a balanced search tree

O(n)

Linear
Time

Execution time increases
linearly with the size of the
input data

Linear traversal
of a list

O(n log n)

Log-Linear
Time

Complexity grows as a
combination of linear and
logarithmic

Merge sort on
a collection of
items

O(n^2)

auadratic
Time

Time taken is proportional to
the square ofthe number of
elements

Checking all
possible pairs in
an array

O(n^3)

Cubic Time

Execution time is proportional
to the cube ofthe number of
elements

Matrix
multiplication of
n x n matrices

O(2^n)

Exponential
Time

Time doubles for every new
element added

Generating all
subsets of a
given set

O(n!)

Factorial
Time

Complexity grows factorially
based on the size ofthe
dataset

Determining all
permutations of
a given list
