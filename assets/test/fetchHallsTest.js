import { fetchHalls } from '../js/bookedSeats.js';

describe('fetchHalls', () => {
  it('should make a successful fetch call', async () => {
// CAN BE ANYTHING THAT IS CORRECT
    const arrangements = [0, 1, 0, 0, 1];
    const hallId = 1;
    const dates = '2023-11-08';
    const timings = '12:00 PM';
    const location_id = 1;


    global.fetch = jest.fn().mockImplementation(() => {
      return Promise.resolve({
        json: () => Promise.resolve(),
      });
    });


    const result = await fetchHalls(arrangements, hallId, dates, timings, location_id);


    expect(result).toEqual();
    expect(global.fetch).toHaveBeenCalledWith();
  });

  it('should handle a fetch error', async () => {

    const arrangements = [0, 1, 0, 0, 1];
    const hallId = 1;
    const dates = '2023-11-08';
    const timings = '12:00 PM';
    const location_id = 1;


    global.fetch = jest.fn().mockImplementation(() => {
      return Promise.reject('Error message');
    });


    const result = await fetchHalls(arrangements, hallId, dates, timings, location_id);


    expect(result).toBeNull();
  });
});

