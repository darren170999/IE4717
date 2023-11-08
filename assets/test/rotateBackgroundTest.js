import { JSDOM } from 'jsdom';
import { fetchAdvertisements, changeBackground } from '../js/rotateBackground.js';

describe('fetchAdvertisements', () => {
  beforeEach(() => {
    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body><div id="background-carousel"></div></body></html>'
    );
    global.document = dom.window.document;
    global.window = dom.window;
    global.fetch = jest.fn();
  });

  it('should fetch advertisements successfully', async () => {
    const mockResponse = [
      { data: 'base64encodedimage1' },
      { data: 'base64encodedimage2' },
    ];
    global.fetch.mockResolvedValue({ json: () => Promise.resolve(mockResponse) });

    await fetchAdvertisements();

    expect(global.fetch).toHaveBeenCalledWith('getAdvertisements.php');
    expect(images).toEqual(mockResponse);
  });

  it('should handle fetch errors', async () => {
    global.fetch.mockRejectedValue(new Error('Network error'));

    await fetchAdvertisements();

    expect(global.fetch).toHaveBeenCalledWith('getAdvertisements.php');
    expect(images).toEqual([]);
  });

  it('should start background rotation', async () => {
    const mockResponse = [
      { data: 'base64encodedimage1' },
      { data: 'base64encodedimage2' },
    ];
    global.fetch.mockResolvedValue({ json: () => Promise.resolve(mockResponse) });

    await fetchAdvertisements();
    jest.useFakeTimers();
    jest.advanceTimersByTime(10000); // Advance the timer by 10 seconds
    expect(changeBackground).toHaveBeenCalledTimes(1);
  });
});
