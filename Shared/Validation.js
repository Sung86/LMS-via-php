/**
* Functions for client side validation of user inputs
* Simple validations 
* @author Sung
* @version 12August2019
*/

/**
* Display error message by prepand <span> tag to the given html tag id 
* with specifying a id for the <span> tag,and append message given
* @param {string} tagID  the html tag id for prepand <span> tag
* @param {string} spanID the html span tag id for append message
* @param {Array, String} message either array of error messages 
* @param {string} color the text-colour
* or a string of error message
*/
function displayMessage(tagID,spanID, message, color){
$('#'+tagID).prepend("<span id='" + spanID + "' class='blink' style='color:"+color+"'><span>");
    if(Array.isArray(message)){
        $.each(message,function(index, value){
            if(typeof(value) !== 'boolean')
                $('#'+spanID).append(value + "<br>");
        });
    }
    else
        $('#'+spanID).append(message + "<br>");
}
/**
* To check whether the inputs of login form are valid
* @param {Array Object} array an Array Object
* @return {Array} return false if no errors, 
* else true with error messages
*/
function checkLogin(array){
    var errors = new Array();
    var username =array[0].value, password= array[1].value;
    if(checkUserName(username) && checkPassword(password))
        return errors.push(false);
    else{
        errors.push(true);
        if(!checkUserName(username))
            errors.push('Invalid username: only 2 to 30 alphabet characters allowed');
        if(!checkPassword(password))
            errors.push('Invalid password: 6-12 charcters and at least 1 lower and' +
                        'uppercase letter and 1 number and 1 of ~ ! # $');
        return errors;
    }
}
/**
 * To check whether the inputs of register form are valid
 * @param {Array} array the given array of register form inputs
 * @return {Array} false if no error, 
 * else true with error messages
 */ 
function checkRegister(array){
    var errors = new Array();
    var name =array[0].value, username= array[1].value,
        email= array[2].value, age= array[3].value,
        address= array[4].value, password= array[5].value;
   
    if(checkName(name) && checkUserName(username) && 
        checkEmail(email) && checkAge(age) && 
        checkAddress(address) && checkPassword(password))
            return errors.push(false);
    else{
        errors.push(true);
        if(!checkName(name))
            errors.push('Invalid name: only 2 to 30 alphabet characters allowed');
        if(!checkUserName(username))
            errors.push('Invalid username: only 2 to 30 alphabet characters allowed');
        if(!checkEmail(email))
            errors.push('Invalid email: please put in a valid email address(max 320 characters allowed); ie: abc@gmail.com');
        if(!checkAge(age))
            errors.push('Invalid age: give a valid age; 1 - 200');
        if(!checkAddress(address))
            errors.push('Invalid address: give a valid address; between 3 - 30 characters');
        if(!checkPassword(password))
            errors.push('Invalid password: 6-20 charcters and at least 1 lower and ' +
                        'uppercase letter and 1 number and 1 of ~ ! # $');
        return errors;
    }
}
/** 
* Check the name given
* @param {string} name the given name
* @return {boolean} true if it matches 2 to 30 alphabet characters;
* otherwise, return false
*/
function checkName(name){
    return (/^[\ a-zA-Z]{2,30}$/).test(name);
}
/** 
* Check the username given
* @param {string} username the given username
* @return {boolean} true if it matches 2 to 30 alphabet characters;
*otherwise, return false
*/
function checkUserName(username){
    return checkName(username);
}
/**
* Check the email address
* @param {string} email the given email
* @return {boolean} true if it matches; else false
*/
function checkEmail(email){
    return (/^((?!.*\.{3})(((?!\.)(?!.*\.@)([a-zA-Z0-9!#$&%`*+-/=?^_'{|}~;,]){1,64}))@((?!\.)(?!.*\.$)([a-zA-Z0-9-.]){1,255}))$/).test(email);
}
/**
* Check wther the age given is between 1 to 200
* @param {int} age the numerical age number
* @return {boolean} true if age is not between the range;
* otherwise return false
*/
function checkAge(age){
    return (1<= age && age <= 200);
}
/**
* Check address given
* @param {string} address the given address
* @return {boolean} true if address is matches else false
*/
function checkAddress(address){
    return (/^[a-zA-Z0-9\s,.'-]{3,30}$/).test(address);
}
/** 
* Check password whether it is secured enough
* @param {string} password the given password
* @return {boolean} true if it matches 6 to 20 alphabet charcters &
* at least 1 lowercase and uppercase letter, 1 number and
* 1 of ~ ! # $
* otherwise, return false
*/
function checkPassword(password){
    return (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!#$])[A-Za-z\d~!#$]{6,20}$/).test(password);
}