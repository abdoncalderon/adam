const Home = ()=> import('./views/Home');
import RegionView from './views/settings/catalog/Region'
import CountryView from './views/settings/catalog/Country'
import StateView from './views/settings/catalog/State'
import CityView from './views/settings/catalog/City'
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
        path: '/countries',
        name: 'countries',
        component: CountryView
      },

      {
        path: '/states',
        name: 'states',
        component: StateView
      },

      {
        path: '/cities',
        name: 'cities',
        component: CityView
      },
    
      {
        path: '/companies',
        name: 'companies',
        component: CompanyView
      },

      
    
      
];