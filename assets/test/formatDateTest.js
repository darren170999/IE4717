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
    // Arrange
    const inputTime = '12:00 PM';

    // Act
    const formattedTime = formatTime(inputTime);

    // Assert
    expect(formattedTime).toBe('12:00:00');
  });

  it('should handle an invalid time', () => {
    // Arrange
    const inputTime = 'invalid-time';

    // Act
    const formattedTime = formatTime(inputTime);

    // Assert
    expect(formattedTime).toBeNull();
  });
});