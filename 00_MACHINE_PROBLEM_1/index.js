// Machine Problem 1 - Sum Parts
// JOHN PAUL S MONTER

// SOLUTION
function partSums(ls) {
    //get total sum
    let sum = 0;
    for (let i = 0; i < ls.length; i++) {
        sum += ls[i];
    }

    //compute for result array
    let result = [sum];
    for (let j = 0; j < ls.length; j++) {
        sum -= ls[j];
        result.push(sum);
    }
    return result;
}


// Test Cases
function test(input, result) {
    let flag = true;
    let sums = partSums(input);
    
    // Verify Result
    if (sums.length !== result.length) flag = false;
    for (let i = 0; i < input.length; i++) {
        if (sums[i] !== result[i]) flag = false;
    }
    
    console.log(flag ? 'Passed' : `Failed\nExpected: ${result}\nActual:   ${sums}`);
} 

test([1, 2, 3, 4, 5, 6], [21, 20, 18, 15, 11, 6, 0])
test([744125, 935, 407, 454, 430, 90, 144, 6710213, 889, 810, 2579358], [10037855, 9293730, 9292795, 9292388, 9291934, 9291504,9291414, 9291270, 2581057, 2580168, 2579358, 0])