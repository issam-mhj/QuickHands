import { createRoot } from 'react-dom/client';
import { createBrowserRouter, RouterProvider} from 'react-router-dom';
import '../css/app.css';

const routes =  [
    {
        path: '/',
        element : <div  className="text-3xl font-bold text-blue-500" >Hello laravel 11 from react 18</div>,
    }
];

createRoot(document.getElementById('root')).render(
    <RouterProvider
    router={createBrowserRouter(routes)}/>
);
