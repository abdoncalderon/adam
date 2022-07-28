const Home = ()=> import('./views/Home');
import RegionView from './views/settings/Region'
import CountryView from './views/settings/Country'
import CompanyView from './views/settings/Company'


export const routes = [
    {
        name:'home',
        path: '/',
        component: Home,
    },
    {
        path: '/regions',
        name: 'regions',
        component: RegionView
      },
    
      {
        path: '/companies',
        name: 'companies',
        component: CompanyView
      },
    
      {
        path: '/countries',
        name: 'countries',
        component: CountryView
      },
];