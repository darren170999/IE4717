import { JSDOM } from 'jsdom';
import { toggleSeatColor } from '../js/seats.js';

describe('toggleSeatColor', () => {
  beforeEach(() => {
    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><ul id="selected-seats-list"></ul>' +
        '<img src="../IE4717/assets/img/calendar.png" />' +
        '<img src="../IE4717/assets/img/hourglass.png" />' +
        '<ul class="seat booked" id="seat1">Seat 1</ul>' +
        '<ul class="seat" id="seat2">Seat 2</ul>' +
        '<ul class="seat" id="seat3">Seat 3</ul>' +
        '<button id="buy-button" style="display: none;">Buy</button>' +
        '</body></html>'
    );
    global.document = dom.window.document;
    global.localStorage = {
      getItem: jest.fn(),
      setItem: jest.fn(),
    };
  });

  it('should toggle seat color and add to selected seats list', () => {
    const seat = document.querySelector('.seat');
    const event = new MouseEvent('click');

    toggleSeatColor(event);

    expect(seat.classList.contains('selected')).toBe(true);
    const selectedSeatsList = document.getElementById('selected-seats-list');
    const listItems = selectedSeatsList.querySelectorAll('li');
    expect(listItems.length).toBe(1);
    expect(listItems[0].textContent).toContain('Seat ID: seat2');
  });

  it('should unselect seat and remove from selected seats list', () => {
    const seat = document.querySelector('.seat');
    seat.classList.add('selected');
    const event = new MouseEvent('click');

    toggleSeatColor(event);

    expect(seat.classList.contains('selected')).toBe(false);
    const selectedSeatsList = document.getElementById('selected-seats-list');
    const listItems = selectedSeatsList.querySelectorAll('li');
    expect(listItems.length).toBe(0);
  });

  it('should do nothing for reserved seats', () => {
    const seat = document.querySelector('.booked');
    const event = new MouseEvent('click');

    toggleSeatColor(event);

    expect(seat.classList.contains('selected')).toBe(false);
    const selectedSeatsList = document.getElementById('selected-seats-list');
    const listItems = selectedSeatsList.querySelectorAll('li');
    expect(listItems.length).toBe(0);
  });

  it('should display Buy button when a seat is selected', () => {
    const seat = document.querySelector('.seat');
    const event = new MouseEvent('click');

    toggleSeatColor(event);

    const buyButton = document.getElementById('buy-button');
    expect(buyButton.style.display).toBe('block');
  });
});
