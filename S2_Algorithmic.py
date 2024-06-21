# bubble sort
def bubble_sort(list):
    for i in range(0,len(list)-1):
        flag = 0
        for j in range(len(list)-1-i):
            if(list[j]>list[j+1]):
                list[j],list[j+1]=list[j+1],list[j]
                flag=1
            print("^^^^",list[j],j)    
        if(flag==0):
            break
        print("------",list,i)    
    return print(list)

# bubble_sort([2,8,9,5,7])      
# bubble_sort([2,3,4,5,6])  
# Big(o) o(n^2)

# inserion sort 
def insertion_sort(arr):
    n = len(arr)
    for i in range(1, n):
        key = arr[i]
        j = i - 1
        while j >= 0 and key < arr[j]:
            arr[j + 1] = arr[j]
            j -= 1
            arr[j + 1] = key
    return arr
            
print(insertion_sort([2,8,9,5,7]))
# Big(o) o(n^2)  best case o(n)        

#          -> merge o(nlog(n))
# tim sort (use) 
#          ->insertion o(n^2) but best is o(n)

# greedy hearistics
# knapsack
# optimal
# brete force => f(n) =< o(2^n) 