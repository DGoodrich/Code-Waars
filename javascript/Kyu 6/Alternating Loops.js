// Description:

// Write

// function combine()

// that combines arrays by alternatingly taking elements passed to it.

// E.g

// combine(['a', 'b', 'c'], [1, 2, 3]) == ['a', 1, 'b', 2, 'c', 3]
// combine(['a', 'b', 'c'], [1, 2, 3, 4, 5]) == ['a', 1, 'b', 2, 'c', 3, 4, 5]
// combine(['a', 'b', 'c'], [1, 2, 3, 4, 5], [6, 7], [8]) == ['a', 1, 6, 8, 'b', 2, 7, 'c', 3, 4, 5]

// Arrays can have different lengths.


function combine() {
  var args = Array.prototype.slice.call(arguments);
  
  var max_len=0;
  
  var i=0;
  
  while(i < args.length) {
   if(max_len < args[i].length) {
       max_len = args[i].length;
   }
   i++;
  }
  
  var result = [];
  
  i = 0;
  
  while(i  < max_len) {
   var j = 0;
   
   while(j < args.length) {
     if(i < args[j].length) {
         result.push(args[j][i]);
     }
     j++;
   }
   i++;
  }
  
  return result;
}
