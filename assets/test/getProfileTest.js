import fetch, { mockResolvedValue, mockRejectedValue } from 'node-fetch';
import { fetchMovies } from '../js/profile.js';

describe('fetchMovies', () => {
  it('should fetch movies successfully', async () => {
    mockResolvedValue({
      json: async () => [
        { title: 'Movie 1', poster: 'poster1.jpg' },
        { title: 'Movie 2', poster: 'poster2.jpg' },
      ],
    });

    await fetchMovies();

    expect(movies).toEqual([
      { title: 'Movie 1', poster: 'poster1.jpg' },
      { title: 'Movie 2', poster: 'poster2.jpg' },
    ]);

    expect(fetch).toHaveBeenCalledWith('getAllMovies.php');
  });

  it('should handle fetch errors', async () => {
    mockRejectedValue(new Error('Network error'));

    await fetchMovies();

    expect(movies).toEqual([]);

    expect(fetch).toHaveBeenCalledWith('getAllMovies.php');
  });
});
