// get all steps controller toggler
let stepOneToggler = document.getElementById('fill_details');
let stepTwoToggler = document.getElementById('get_verified');
let stepThreeToggler = document.getElementById('fund_account');
let stepFourToggler = document.getElementById('done');
// window on load, add the border bottom color to the first step toggler
window.addEventListener('load', () => {
  stepOneToggler.style.borderBottom = '2px solid green';
})
// get all steps displayer 
let stepOne = document.getElementById('first_step');
let stepTwo = document.getElementById('sec_step');
let stepThree = document.getElementById('third_step');
let stepFour = document.getElementById('fourth_step');

stepOneToggler.addEventListener('click', () => {
  setTimeout(() => {
    // when clicked, make the step one toggler border bottom to green and set the rest to none
    stepOneToggler.style.borderBottom = '2px solid green';
    stepTwoToggler.style.borderBottom = 'none';
    stepThreeToggler.style.borderBottom = 'none';
    stepFourToggler.style.borderBottom = 'none';
    // display the step one and set the rest to none
    stepOne.style.display = 'flex';
    stepTwo.style.display = 'none';
    stepThree.style.display = 'none';
    stepFour.style.display = 'none';
  }, 500);
})
stepTwoToggler.addEventListener('click', () => {
  setTimeout(() => {
    // when clicked, make the step two toggler border bottom to green and set the rest to none
    stepTwoToggler.style.borderBottom = '2px solid green';
    stepOneToggler.style.borderBottom = 'none';
    stepThreeToggler.style.borderBottom = 'none';
    stepFourToggler.style.borderBottom = 'none';
    // display the step two and set the rest to none
    stepTwo.style.display = 'flex';
    stepOne.style.display = 'none';
    stepThree.style.display = 'none';
    stepFour.style.display = 'none';
  }, 500);
})
stepThreeToggler.addEventListener('click', () => {
  setTimeout(() => {
    // when clicked, make the step three toggler border bottom to green and set the rest to none
    stepThreeToggler.style.borderBottom = '2px solid green';
    stepTwoToggler.style.borderBottom = 'none';
    stepOneToggler.style.borderBottom = 'none';
    stepFourToggler.style.borderBottom = 'none';
    // display the step three and set the rest to none
    stepThree.style.display = 'flex';
    stepOne.style.display = 'none';
    stepTwo.style.display = 'none';
    stepFour.style.display = 'none';
  }, 500);
})
stepFourToggler.addEventListener('click', () => {
  setTimeout(() => {
    // when clicked, make the step four toggler border bottom to green and set the rest to none
    stepFourToggler.style.borderBottom = '2px solid green';
    stepTwoToggler.style.borderBottom = 'none';
    stepOneToggler.style.borderBottom = 'none';
    stepThreeToggler.style.borderBottom = 'none';
    // display the step four and set the rest to none
    stepFour.style.display = 'flex';
    stepTwo.style.display = 'none';
    stepOne.style.display = 'none';
    stepThree.style.display = 'none';
  }, 500);
})