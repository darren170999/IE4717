// Mock fetch and jsdom
import { sandbox } from 'fetch-mock';
import jsdom from 'jsdom';
import { fetchHalls, sendPurchase } from './your-original-file.js';

beforeAll(() => {
    global.fetch = sandbox();
});

afterEach(() => {
    global.fetch.reset();
});

afterAll(() => {
    global.fetch.restore();
});

describe('fetchHalls', () => {
    const mockResponse = { data: 'some data' };

    it('should fetch halls', async () => {
        global.fetch.mock('/confirmArrangements.php', mockResponse);

        const result = await fetchHalls('arrangements', 'hallId', 'dates', 'timings', 'location_id', 'username', 'total');

        expect(result).toEqual(mockResponse);
    });

    it('should handle fetch error', async () => {
        global.fetch.mock('/confirmArrangements.php', 500); // Simulate a fetch error (status code 500)

        const result = await fetchHalls('arrangements', 'hallId', 'dates', 'timings', 'location_id', 'username', 'total');

        expect(result).toBeNull();
    });
});

describe('sendPurchase', () => {
    const mockResponse = { data: 'some data' };

    it('should send a purchase', async () => {
        global.fetch.mock('/sendPurchase.php', mockResponse);

        const result = await sendPurchase('arrangements', 'hallId', 'dates', 'timings', 'location_id', 'username', 'total');

        expect(result).toEqual(mockResponse);
    });

    it('should handle fetch error', async () => {
        global.fetch.mock('/sendPurchase.php', 500);

        const result = await sendPurchase('arrangements', 'hallId', 'dates', 'timings', 'location_id', 'username', 'total');

        expect(result).toBeNull();
    });
});
