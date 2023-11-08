import { fetchMovies, setBackgroundImage, anythingLah } from '../js/fetchAssetsForBookings.js';

describe('fetchMovies', () => {
  it('should fetch movie data successfully', async () => {
    const selectedMovieName = 'Example Movie';
    const mockResponse = {
      json: () => Promise.resolve([
        {
          movie_title: 'Example Movie',
          sypnopsis: 'A great movie',
          movie_data: 'base64encodedimage',
          hall_id: 1,
          location_id: 2,
          price: 10,
          ratings: 4.5,
        },
      ]),
    };
    global.fetch = jest.fn().mockImplementation(() => Promise.resolve(mockResponse));

    const data = await fetchMovies(selectedMovieName);

    expect(data).toEqual([
      {
        movie_title: 'Example Movie',
        sypnopsis: 'A great movie',
        movie_data: 'base64encodedimage',
        hall_id: 1,
        location_id: 2,
        price: 10,
        ratings: 4.5,
      },
    ]);
    expect(global.fetch).toHaveBeenCalledWith('getSelectedMovies.php?selectedMovieName=Example%20Movie');
  });

  it('should handle fetch errors', async () => {

    const selectedMovieName = 'Example Movie';
    global.fetch = jest.fn().mockImplementation(() => Promise.reject('Error message'));

    const data = await fetchMovies(selectedMovieName);

    expect(data).toBeNull();
  });
});

describe('setBackgroundImage', () => {
  it('should set background image and update title and synopsis', () => {
    const imageUrl = 'data:image/jpeg;base64,base64encodedimage';
    const titleElement = document.createElement('div');
    titleElement.id = 'title';
    const synopsisElement = document.createElement('div');
    synopsisElement.id = 'synopsis';
    document.body.appendChild(titleElement);
    document.body.appendChild(synopsisElement);

    const selectedMovie = [
      {
        movie_title: 'Example Movie',
        sypnopsis: 'A great movie',
      },
    ];

    setBackgroundImage(imageUrl);

    expect(document.body.style.backgroundImage).toBe(`url(${imageUrl})`);
    expect(titleElement.textContent).toBe('Example Movie');
    expect(synopsisElement.textContent).toBe('A great movie');
  });
});

describe('anythingLah', () => {
  it('should set background image if selectedMovie has data', () => {
    const imageUrl = 'data:image/jpeg;base64,base64encodedimage';
    const selectedMovie = [
      {
        movie_data: 'base64encodedimage',
      },
    ];

    anythingLah();

    expect(document.body.style.backgroundImage).toBe(`url(${imageUrl})`);
  });

  it('should not set background image if selectedMovie is empty', () => {
    const imageUrl = 'data:image/jpeg;base64,base64encodedimage';
    const selectedMovie = [];

    anythingLah();

    expect(document.body.style.backgroundImage).toBe('');
  });
});
