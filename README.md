This is my attempt at solving this challenge.

Description:
Given an array consisting of N integers, and integers X and Y denoting 2 different lengths, write a function that returns the sum of the longest chain of values in the array of lengths X, and Y, where there is no overlap.

E.g:
```
array = [
    7,
    2,
    9,
    3,
    8,
    4,
    11,
    0,
    5,
    16,
];
X = 3;
Y = 2;
```
Where X = 3, and Y = 2. The value of X would be 23 because the longest consecutive chain of 3 values is 8 + 4 + 11 = 23.
The value of Y would then be 21 because the longest consecutive chain of 2 values would now be 5 + 16 = 21.
The values used for X should not be counted again when calculating Y.
Ergo, the function will return 44 because 23 + 21 = 44.

If it's not possible to get 2 disjointed intervals, then return -1.
E.g. array = [1,2,10], X = 3, Y = 4.

Requirements - Your algorithm needs to be efficient enough for the following:
* N is an int with range 2..100,000
* X and Y are ints with range 1..N-1
* Each element of the array is an int with range 1..1,000,000,000
* Provide the answer modulo 10e9 + 7
