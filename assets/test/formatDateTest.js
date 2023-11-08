import { formatDate } from '../js/arrangements.js';
import { formatTime } from '../js/bookedSeats.js';

describe('formatDate', () => {
  it('should format a valid date correctly', () => {
    const inputDate = '2023-11-08';
    const formattedDate = formatDate(inputDate);
    expect(formattedDate).toBe('2023-11-08');
  });

  it('should handle an invalid date', () => {
    const inputDate = 'invalid-date';
    const formattedDate = formatDate(inputDate);
    expect(formattedDate).toBeNull();
  });
});
describe('formatTime', () => {
  it('should format a valid time correctly', () => {
    const inputTime = '12:00 PM';
    const formattedTime = formatTime(inputTime);
    expect(formattedTime).toBe('12:00:00');
  });

  it('should handle an invalid time', () => {
    const inputTime = 'invalid-time';
    const formattedTime = formatTime(inputTime);
    expect(formattedTime).toBeNull();
  });
});