// MACHINE PROBLEM 2
// Bottle Collector
// JOHN PAUL S MONTER

// SOLUTION
function calculateEarningsPerDay (expedition) {
    let [hours, path, price] = expedition.split(" ");
    
    // Computation
    let found = 0;
    for (let i = 0; i < hours; i++) {
        if (path[i % path.length] === 'B') {
            found++;
        }
    }
    return found * parseFloat(price);
}

function name (dailyExpense, expeditionList) {
    if (!expeditionList.length) {
        return {result: false, message: "Invalid Input"};
    }
    
    let total = 0;
    for (let expedition of expeditionList) {
        total += calculateEarningsPerDay(expedition);
    }
    
    const averageEarnings = total / expeditionList.length;
    let totalDailyExpenses = dailyExpense * expeditionList.length;
    
    if (dailyExpense > averageEarnings) {
        return { 
            result: false, 
            message: `Hard times. Money Needed: ${(totalDailyExpenses - total).toFixed(2)}`
        }
    } else {
        return {
            result: true,
            message: `Good Earnings. Extra money per day: ${(averageEarnings - dailyExpense).toFixed(2)}`
        }
    }
}

console.log(name(10, ["8 ABMRB 24.50"]).message); // Good Earnings. Extra money per day: 63.50
