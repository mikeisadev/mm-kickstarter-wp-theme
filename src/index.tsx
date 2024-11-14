import { createRoot } from 'react-dom/client'
import { App } from './partials/App'

import './styles/main.css'

const rootElement = document.querySelector('#root')
const root = createRoot((rootElement as HTMLElement))

root.render(<App title='WP Theme Kickstarter' text='Bevenuto sul WP Theme kickstarter di Michele Mincone realizzato su un tema WordPress in PHP, CarbonFields (per i custom fields), Typescript, React e Tailwind.' url='https://michelemincone.com'/>)

console.log('index js loaded')