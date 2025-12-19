function hello(){
    console.log("hello")
}
hello()
function add(n1,n2){
    var val=n1+n2
    console.log(val)
}
add(5,3)
function multiply(num1,num2){
    var val =num1*num2
    return val
}
multiply(3,4)
console.log(multiply(3,4))
var y=function(){
    console.log("this is y")
}
y()
function callanotherfn(fn){
    console.log("call another function")
    fn()
}
callanotherfn(y)
callanotherfn(()=>{
    console.log("this is a parameter")
})

for (let i =0;i<5;i++){
    var d=2
    let f=2
    console.log(i);
}
console.log(d)
var arr=[1,2,3,"name","string"]
console.log(arr)
console.log(arr[2])
arr[3]=40
console.log(arr[3])
console.log(arr)
console.log(arr.length)
arr.pop()
console.log(arr)
arr.push(90,70)
console.log(arr)
arr.splice(3,0,190)
console.log(arr)
arr.shift()
console.log(arr)
arr.unshift("first val")
console.log(arr)


