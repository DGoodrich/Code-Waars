// Description:

// For a given list [x1, x2, x3, ..., xn] compute the last (decimal) digit of x1 ^ (x2 ^ (x3 ^ (... ^ xn))).

// Eg.,

// lastDigit [3, 4, 2] == 1

// because 3 ^ (4 ^ 2) = 3 ^ 16 = 43046721.

// Beware: powers grow incredibly fast. For example, 9 ^ (9 ^ 9) has more than 369 millions of digits. lastDigit has to deal with such numbers efficiently.

// Corner cases: we assume that 0 ^ 0 = 1 and that lastDigit of an empty list equals to 1.

// This kata generalizes Last digit of a large number; you may find useful to solve it beforehand.

function lastDigit(as){
  if (as.length === 0) 
  {
    return 1;
  }
  
  if (as.length === 1) 
  {
    return as[0] % 10;
  }
  
  var last =  as[as.length-1] === 0 ? 1 : Math.pow(as[as.length-2] % 100, as[as.length-1] % 4 + 4);
  
  as = as.slice(0,-2); 
  as.push(last);
  
  return lastDigit(as);
}
