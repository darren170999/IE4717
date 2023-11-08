import { JSDOM } from 'jsdom';
import { fetchMoviePosters, createPosters } from './your-original-file.js';

describe('fetchMoviePosters', () => {
  beforeEach(() => {
    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body>' +
        '<div id="movie-list"></div>' +
        '</body></html>'
    );
    global.document = dom.window.document;
    global.fetch = jest.fn(() => Promise.resolve({
      json: () => Promise.resolve([{ title: 'Movie 1', ratings: 4.5, data: 'abcd' }])
    }));
  });

  it('should fetch movie posters and call createPosters', async () => {
    global.fetch.mockClear();

    await fetchMoviePosters();

    expect(global.fetch).toHaveBeenCalledWith('getMovies.php');
    expect(document.querySelectorAll('.movie-poster').length).toBe(1);
  });
});

describe('createPosters', () => {
  beforeEach(() => {
    const dom = new JSDOM(
      '<!DOCTYPE html><html><head></head><body>' +
        '<div id="movie-list"></div>' +
        '</body></html>'
    );
    global.document = dom.window.document;
  });

  it('should create movie posters from data', () => {
    const sampleData = [
      { title: 'Movie 1', ratings: 4.5, data: 'abcd' },
      { title: 'Movie 2', ratings: 4.2, data: 'efgh' },
    ];

    createPosters(sampleData);

    const moviePosterDivs = document.querySelectorAll('.movie-poster');
    expect(moviePosterDivs.length).toBe(2);

    moviePosterDivs.forEach((div, i) => {
      const image = div.querySelector('.movie-image');
      const title = div.querySelector('.movie-title');
      const rating = div.querySelector('.movie-rating');
      
      expect(image).not.toBeNull();
      expect(image.src).toBe(`data:image/jpeg;base64,${sampleData[i].data}`);
      expect(title).not.toBeNull();
      expect(title.textContent).toBe(sampleData[i].title);
      expect(rating).not.toBeNull();
      expect(rating.textContent).toBe(sampleData[i].ratings.toString());
    });
  });
});
