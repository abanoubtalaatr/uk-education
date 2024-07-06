import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((Vue, router, store) => {
  Vue.component('index-booking-calendar', IndexField)
  Vue.component('detail-booking-calendar', DetailField)
  Vue.component('form-booking-calendar', FormField)
})
