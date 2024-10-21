
/**
 * Handles AJAX errors and displays an alert.
 * 
 * @param {object} xhr - The XMLHttpRequest object.
 * @param {string} status - The status of the error.
 * @param {string} error - The error message.
 */
function handleAjaxError(xhr, status, error) {
    // Construct the error message
    var errorMessage = xhr.status + ': ' + xhr.statusText;

    // Show alert with error message
    showAlert('AJAX Error - ' + errorMessage);
}

/**
 * Displays an alert message in the specified container.
 * 
 * @param {string} message - The message to display in the alert.
 */
function showAlert(message) {
    // Construct the alert template
    var alertTemplate = '<div class="alert alert-danger" role="alert">' +
                           '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                               '<span aria-hidden="true">&times;</span>' +
                           '</button>' +
                           message +
                       '</div>';
    
    // Show the alert in the designated container
    $('#alert-container').html(alertTemplate);
}


/**
 * Allows only numbers (without decimal point) on key press.
 * 
 * @param {Event} evt - The key press event object.
 * @returns {boolean} - True if the key press is allowed, false otherwise.
 */
function allowOnlyNumbers(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }    
    return true;
}

/**
 * Allows numbers only (with decimal point) on key press.
 * 
 * @param {Event} evt - The key press event object.
 * @returns {boolean} - True if the key press is allowed, false otherwise.
 */
function allowDecimalNumbers(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode!=37 && charCode!=39 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }    
    return true;
}

/**
 * Replaces a character at a specific index in a string.
 * 
 * @param {string} str - The input string.
 * @param {number} index - The index at which to replace the character.
 * @param {string} chr - The character to replace at the specified index.
 * @returns {string} - The modified string.
 */
function setCharAt(str, index, chr) {
    if(index > str.length-1) return str;
    return str.substr(0,index) + chr + str.substr(index+1);
}

/**
 * Encrypts a password with a randomly generated code.
 * 
 * @param {string} password - The password to encrypt.
 * @returns {string} - The encrypted password.
 */
function code_encrypr(password) {
    var code_length     = password.length;
    var length          = 60;
    var password_start  = Math.floor(Math.random() * 20);
    var result          = '';
    var split_key       = '*a)80000';
    var string          = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz!@#$%^&*()_+-=?><:"}{|';
    var charactersLength = string.length;
    for ( var i = 0; i < length; i++ ) {
        result += string.charAt(Math.floor(Math.random() * charactersLength));
    }

    return setCharAt(result,password_start,password)+split_key+password_start+split_key+code_length;
}

/**
 * Validates percentage input and restricts input to a valid decimal format (up to 2 decimal places).
 * If the value exceeds 99, it sets it to 99.
 * 
 * @param {HTMLInputElement} input - The input element to validate.
 */
function validatePercentageInput(input) {
    const value = input.value;

    // Use a regular expression to check for a valid decimal format
    const validDecimalPattern = /^\d+(\.\d{0,2})?$/;

    if (!validDecimalPattern.test(value)) {
        // If the input doesn't match the pattern, clear the input value
        input.value = '';
    } else if (parseFloat(value) > 99) {
        // If the value is greater than 99, set it to 99
        input.value = '99';
    }
}


/**
 * Validates input to ensure it's not empty and meets a minimum and maximum length criteria.
 * 
 * @param {string} input - The input value to validate.
 * @param {number} minLength - The minimum length required for the input value.
 * @param {number} maxLength - The maximum length allowed for the input value.
 * @returns {boolean} - True if the input is valid, false otherwise.
 */
function validateInput(input, minLength, maxLength) {
    // Trim whitespace from input
    input = input.trim();

    // Check if input is empty
    if (input === '') {
        return false;
    }

    // Check if input length is within the specified range
    if (input.length < minLength || input.length > maxLength) {
        return false;
    }

    // Input is valid
    return true;
}

/**
 * Performs common input validation checks.
 * 
 * @param {string} input - The input value to validate.
 * @param {string} type - The type of validation to perform ('required', 'numeric', 'email', 'password', 'url', 'phone', 'date').
 * @returns {boolean} - True if the input passes validation, false otherwise.
 */
function validateInput(input, type) {
    switch (type) {
        case 'required':
            // Check if input is not empty
            return input.trim() !== '';
        case 'numeric':
            // Check if input is numeric
            return !isNaN(input);
        case 'email':
            // Check if input is a valid email address
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(input);
        case 'password':
            // Check if password meets minimum requirements (e.g., at least 8 characters long)
            return input.length >= 8;
        case 'url':
            // Check if input is a valid URL
            try {
                new URL(input);
                return true;
            } catch (error) {
                return false;
            }
        case 'phone':
            // Check if input is a valid phone number (10 digits)
            const phonePattern = /^\d{10}$/;
            return phonePattern.test(input);
        case 'date':
            // Check if input is a valid date in the format YYYY-MM-DD
            const datePattern = /^\d{4}-\d{2}-\d{2}$/;
            return datePattern.test(input);
        default:
            return false;
    }
}

/**
 * Formats a date object into a string with a specified format.
 * 
 * @param {Date} date - The date object to format.
 * @param {string} format - The desired format for the date (e.g., 'YYYY-MM-DD').
 * @returns {string} - The formatted date string.
 */
function formatDate(date, format = 'YYYY-MM-DD') {
    // Define a map of date components and their corresponding values
    const map = {
        'YYYY': date.getFullYear(),
        'MM': ('0' + (date.getMonth() + 1)).slice(-2),
        'DD': ('0' + date.getDate()).slice(-2),
        'hh': ('0' + date.getHours()).slice(-2),
        'mm': ('0' + date.getMinutes()).slice(-2),
        'ss': ('0' + date.getSeconds()).slice(-2)
    };

    // Replace placeholders in the format string with actual date values
    return format.replace(/YYYY|MM|DD|hh|mm|ss/g, match => map[match]);
}

/**
 * Toggles a CSS class on/off for a given element.
 * 
 * @param {HTMLElement} element - The HTML element to toggle the class on.
 * @param {string} className - The name of the CSS class to toggle.
 */
function toggleClass(element, className) {
    if (element.classList) {
        // If the element supports classList, use the built-in toggle method
        element.classList.toggle(className);
    } else {
        // For older browsers, manually toggle the class in the element's className
        var classes = element.className.split(' ');
        var existingIndex = classes.indexOf(className);

        if (existingIndex >= 0) {
            classes.splice(existingIndex, 1);
        } else {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }
}

/**
 * Fetches JSON data from the specified URL using the Fetch API.
 * 
 * @param {string} url - The URL to fetch JSON data from.
 * @returns {Promise<any>} - A Promise that resolves to the parsed JSON data.
 */
async function fetchJSON(url) {
    try {
        const response = await fetch(url);
        return response.json();
    } catch (error) {
        // Handle any errors that occur during the fetch
        console.error('Error fetching JSON:', error);
        throw error;
    }
}


/**
 * Throttles the execution of a function to limit the rate at which it can be called.
 * 
 * @param {Function} func - The function to throttle.
 * @param {number} limit - The time limit (in milliseconds) between function calls.
 * @returns {Function} - A throttled version of the original function.
 */
function throttle(func, limit) {
    let inThrottle;

    // Return a throttled version of the original function
    return function() {
        const args = arguments;
        const context = this;

        // If not currently in throttle mode
        if (!inThrottle) {
            // Execute the original function with the provided arguments and context
            func.apply(context, args);
            // Set inThrottle to true to indicate throttle mode is active
            inThrottle = true;
            // After the specified limit, reset inThrottle to false to allow the function to be called again
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

/**
 * Debounces the execution of a function, ensuring it is only called after a specified delay has elapsed
 * since the last invocation.
 * 
 * @param {Function} func - The function to debounce.
 * @param {number} delay - The delay (in milliseconds) before invoking the function after the last call.
 * @returns {Function} - A debounced version of the original function.
 */
function debounce(func, delay) {
    let timeoutId;

    // Return a debounced version of the original function
    return function(...args) {
        // Clear any existing timeout
        clearTimeout(timeoutId);
        // Set a new timeout to invoke the function after the specified delay
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

/**
 * Creates a deep clone of an object by converting it to JSON and then parsing it.
 * 
 * @param {Object} obj - The object to clone.
 * @returns {Object} - The deep cloned object.
 */
function deepClone(obj) {
    return JSON.parse(JSON.stringify(obj));
}

/**
 * Checks if a value exists in an array.
 * 
 * @param {*} value - The value to search for.
 * @param {Array} array - The array to search within.
 * @returns {boolean} - True if the value is found in the array, false otherwise.
 */
function isInArray(value, array) {
    return array.indexOf(value) > -1;
}

/**
 * Generates a random integer within the specified range.
 * 
 * @param {number} min - The minimum value of the range (inclusive).
 * @param {number} max - The maximum value of the range (inclusive).
 * @returns {number} - A random integer within the specified range.
 */
function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Formats a number with commas for readability.
 * 
 * @param {number} number - The number to format.
 * @returns {string} - The formatted number with commas.
 */
function formatNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/**
 * Detects whether the current device is a mobile device.
 * 
 * @returns {boolean} - True if the device is a mobile device, false otherwise.
 */
function isMobileDevice() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

/**
 * Scrolls the window to the top smoothly.
 */
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/**
 * Parses query parameters from the current URL and returns them as an object.
 * 
 * @returns {Object} - An object containing the parsed query parameters.
 */
function getQueryParams() {
    var queryParams = {};
    var queryString = window.location.search.substring(1);
    var params = queryString.split('&');
    for (var i = 0; i < params.length; i++) {
        var pair = params[i].split('=');
        queryParams[pair[0]] = decodeURIComponent(pair[1]);
    }
    return queryParams;
}