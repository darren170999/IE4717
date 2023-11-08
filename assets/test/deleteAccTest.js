import { JSDOM } from 'jsdom';
import { initializeDeleteAccountButton } from '../js/deleteAccount.js';
describe('initializeDeleteAccountButton', () => {
  let dom;
  let document;
  let button;

  beforeAll(() => {
    dom = new JSDOM('<!DOCTYPE html><html><body><button id="deleteAccountButton"></button></body></html>');
    document = dom.window.document;
    button = document.getElementById('deleteAccountButton');
  });

  it('should add a click event listener to the delete button', () => {

    const mockPreventDefault = jest.fn();
    const mockFetch = jest.fn(() => Promise.resolve({ json: () => Promise.resolve() }));
    global.fetch = mockFetch;
    button.clickEvent = new Event('click');
    initializeDeleteAccountButton(document);
    button.dispatchEvent(button.clickEvent);
    expect(mockPreventDefault).toHaveBeenCalled();
    expect(mockFetch).toHaveBeenCalledWith(
      'deleteAccount.php?hall_id=&dates=&timings=&arrangements=&location_id=&username=&total='
    );
  });
  it('should handle fetch errors', () => {
    const mockPreventDefault = jest.fn();
    const mockFetch = jest.fn(() => Promise.reject('Error message'));
    global.fetch = mockFetch;
    button.clickEvent = new Event('click');
    initializeDeleteAccountButton(document);
    button.dispatchEvent(button.clickEvent);
    expect(mockPreventDefault).toHaveBeenCalled();
  });
});
