const email = document.getElementById('email');
const username = document.getElementById('username');
const fullName = document.getElementById('fullName');
const phoneNumber = document.getElementById('phoneNumber');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');

const form = document.querySelector('form');

const errorElement = document.getElementById('passwordError');
// handling form event to check all form is already full filled or not
form.addEventListener('input', checkForm);

// Call checkForm on input events
confirmPassword.addEventListener('input', checkConfirmPassword);

// check phone number only number allowed
phoneNumber.addEventListener('input', () => {
  const regex = new RegExp(/\D/);
  if (regex.test(phoneNumber.value)) {
    phoneNumber.value = phoneNumber.value.replace(regex, '');
  }
});

/**
 * 
 * @param {Event} e 
 * @returns 
 */
function checkForm(e) {
  
  /**
   * errorElement.textContent = 'Password tidak sama.';
    errorElement.style.textAlign = 'center';
    errorElement.style.backgroundColor = 'red';
    errorElement.style.padding = '10px';
    errorElement.style.color = '#fff';
   */

  const formIsFilled = 
    email.value &&
    username.value &&
    fullName.value &&
    phoneNumber.value &&
    password.value && 
    confirmPassword.value;

    // If all checks pass, enable the register button
  toggleButton(formIsFilled);
}

function toggleButton(enable = true) {
  const registerButton = document.getElementById('registerButton');
  registerButton.disabled = !enable;
}

function checkConfirmPassword() {
  const passwordValue = password.value;
  const confirmPasswordValue = confirmPassword.value;

  const notmatchElemet = document.querySelector('.password__notmatch');

  if (passwordValue !== confirmPasswordValue) {
    confirmPassword.classList.add('invalid__data');
    notmatchElemet.classList.remove('hidden');
  } else {
    confirmPassword.classList.remove('invalid__data');
    notmatchElemet.classList.add('hidden');
  }
}