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
# for(i=1; i<=n;i++)
#     for(j=1; j<= 1000 ; j++)
# big o here is o(n) coz n+1000n
##################################### 
    # for(i=1;i<=n;i++)
    #   for(j=1; j<= n*n ; j*=2)
# big o here is o(n) 
##################################### 
# for(i=1;i<=n;i++)
#   for(j=1; j<= n*n ; j+=2)
# big o here is o(n^3) 




