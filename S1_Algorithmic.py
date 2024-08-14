# typy of algorithem
# linear
def linear(L, x):
    for e in L:
        if e == x:
            return True
    return False

# binary
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

# Bubble Sorting Algroithm
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

# Selection Sort Algroithm
def selectionSort(array):
    n = len(array)
    
    for i in range(n - 1):
        min_index = i
        
        for j in range(i + 1, n):
            if array[j] < array[min_index]:
                min_index = j

        if min_index != i:
            array[i], array[min_index] = array[min_index], array[i]
    
    return array





####################################################################################################################################################
### Storing Data in Algorithms
# - Register: 1 value
# - Cache: 3 values
# - RAM: 100-1000 values
# - Hard Disk: 10⁶ values


### Examples of Big O Calculations

####  1

# for(i = 1; i <= 2 * n; i++)
# - Big O: O(n)

# ####  2

# for(i = 3; i <= n; i *= 2)
# - Big O: O(log₂(n))

# ####  3

# for(i = 1; i <= n; i *= 3)
# - Big O: O(log₃(n))

# ####  4

# for(i = 1; i <= n; i += 2)
# - Big O: O(n)

# ####  5

# for(i = 1; i <= n; i++)
#     for(j = 1; j <= 1000; j++)
# - Big O: O(n)

# ####  6

# for(i = 1; i <= n; i++)
#     for(j = 1; j <= j + 3; j++)
# - Big O: O(n)

# ####  7

# for(i = 1; i <= n; i++)
#     for(j = 1; j <= n * n; j += 2)
# - Big O: O(n³)

# ####  8

# for(i = 1; i <= n; i++)
#     for(j = 1; j <= n; j *= 2)
# - Big O: O(n log₂(n))

# ####  9

# for(i = 1; i <= n; i++)
#     for(j = 1; j <= n * n; j *= 2)
# - Big O: O(n²)


# calcolit BIG O
# - O(1) < O(log(n)) < O(√n) < O(n) < O(n log(n)) < O(n²) < O(2ⁿ) < O(n!) < O(nⁿ)

# Big-O 

# | Big-O      | Name             | Description                                               | Example                             |
# |------------|------------------|-----------------------------------------------------------|-------------------------------------|
# | O(1)       | Constant Time    | Execution time remains unchanged irrespective of input data | Checking if a stack is empty        |
# | O(log n)   | Logarithmic Time | Complexity increases by one unit for each doubling of input data | Finding an item in a balanced search tree |
# | O(n)       | Linear Time      | Execution time increases linearly with the size of the input data | Linear traversal of a list          |
# | O(n log n) | Log-Linear Time  | Complexity grows as a combination of linear and logarithmic | Merge sort on a collection of items |
# | O(n²)      | Quadratic Time   | Time taken is proportional to the square of the number of elements | Checking all possible pairs in an array |
# | O(n³)      | Cubic Time       | Execution time is proportional to the cube of the number of elements | Matrix multiplication of n x n matrices |
# | O(2ⁿ)      | Exponential Time | Time doubles for every new element added                   | Generating all subsets of a given set |
# | O(n!)      | Factorial Time   | Complexity grows factorially based on the size of the dataset | Determining all permutations of a given list |



