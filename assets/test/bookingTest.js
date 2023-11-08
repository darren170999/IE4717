import { JSDOM } from 'jsdom';
import { handleClick, updateInstructions, generateDateBoxes, addEventListeners } from '../js/scriptBooking.js';

describe('handleClick', () => {
  beforeEach(() => {

    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><div class="date-box">Date 1</div><div class="date-box">Date 2</div>' +
        '<div class="time-box">Time 1</div><div class="time-box">Time 2</div><div id="instructions"></div></body></html>'
    );
    global.document = dom.window.document;
  });

  it('should handle click event and update active class', () => {
    const event = new MouseEvent('click');
    const dateBox1 = document.querySelector('.date-box');
    const dateBox2 = document.querySelectorAll('.date-box')[1];
    const timeBox1 = document.querySelector('.time-box');
    const instructionElement = document.getElementById('instructions');

    handleClick(event);

    expect(dateBox1.classList.contains('active')).toBe(false);
    expect(dateBox2.classList.contains('active')).toBe(true);
    expect(timeBox1.classList.contains('active')).toBe(false);
    expect(instructionElement.textContent).toBe('Date 2, Time 1');
  });
});

describe('updateInstructions', () => {
  beforeEach(() => {
    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><div class="date-box active">Date 1</div>' +
        '<div class="time-box active">Time 2</div><div id="instructions"></div></body></html>'
    );
    global.document = dom.window.document;
  });

  it('should update the instruction text', () => {
    updateInstructions();

    const instructionElement = document.getElementById('instructions');
    expect(instructionElement.textContent).toBe('Date 1, Time 2');
  });
});

describe('generateDateBoxes', () => {
  beforeEach(() => {

    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><div class="date-boxes"></div></body></html>'
    );
    global.document = dom.window.document;
  });

  it('should generate date boxes with active class', () => {

    generateDateBoxes();

    const dateBoxes = document.querySelectorAll('.date-box');
    expect(dateBoxes.length).toBe(5);
    expect(dateBoxes[3].textContent).toBe('Thu 1/4');
    expect(dateBoxes[3].classList.contains('active')).toBe(true);
  });
});

describe('addEventListeners', () => {
  beforeEach(() => {

    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><div class="date-box">Date 1</div><div class="time-box">Time 1</div></body></html>'
    );
    global.document = dom.window.document;
  });

  it('should add click event listeners to date and time boxes', () => {

    const dateBox = document.querySelector('.date-box');
    const timeBox = document.querySelector('.time-box');

    const addEventListenerSpy = jest.spyOn(dateBox, 'addEventListener');

    addEventListeners();

    expect(addEventListenerSpy).toHaveBeenCalledWith('click', handleClick);
  });
});
