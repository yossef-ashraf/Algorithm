### Calculating the Execution Time of an Algorithm with Asymptotic Complexity

#### Question:
You have an algorithm with an unknown asymptotic complexity. If this algorithm takes 3 seconds to process an input of size \( 10^4 \), how much time will it take to process an input of size \( 10^5 \) on the same machine?

#### Solution:
To calculate the time it will take to process an input of size \( 10^5 \), we need to know the asymptotic complexity of the algorithm. Based on that, we can estimate the time required as the input size increases.

Let's explore some common cases of time complexity:

#### 1. **Linear Complexity \( O(n) \):**
In this type of complexity, the time increases linearly with the size of the input \( n \).
- The time \( T(n) \) is proportional to \( n \).
- The time required to process an input of size \( 10^5 \) will be:
  \[
  T(10^5) = T(10^4) \times \frac{10^5}{10^4} = 3 \times 10 = 30 \text{ seconds}
  \]

#### 2. **Quadratic Complexity \( O(n^2) \):**
In this type of complexity, the time increases with the square of the input size \( n \).
- The time \( T(n) \) is proportional to \( n^2 \).
- The time required to process an input of size \( 10^5 \) will be:
  \[
  T(10^5) = T(10^4) \times \left(\frac{10^5}{10^4}\right)^2 = 3 \times 100 = 300 \text{ seconds}
  \]

#### 3. **Logarithmic Complexity \( O(\log n) \):**
In this type of complexity, the time increases with the logarithm of the input size \( n \).
- The time \( T(n) \) is proportional to \( \log n \).
- The time required to process an input of size \( 10^5 \) will be:
  \[
  T(10^5) = T(10^4) \times \frac{\log(10^5)}{\log(10^4)} = 3 \times \frac{5}{4} = 3.75 \text{ seconds}
  \]
  where \( \log(10^5) \approx 5 \) and \( \log(10^4) \approx 4 \).

#### 4. **Linearithmic Complexity \( O(n \log n) \):**
In this type of complexity, the time increases with the product of the input size \( n \) and the logarithm of \( n \).
- The time \( T(n) \) is proportional to \( n \log n \).
- The time required to process an input of size \( 10^5 \) will be:
  \[
  T(10^5) = T(10^4) \times \frac{10^5 \log(10^5)}{10^4 \log(10^4)} = 3 \times \frac{10 \times 5}{4} = 37.5 \text{ seconds}
  \]

#### Conclusion:
The time required to process an input of size \( 10^5 \) depends heavily on the algorithm's time complexity. If you know the algorithm's asymptotic complexity, you can determine the required time using the calculations outlined above.