import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'
import PreviewField from './components/PreviewField'

Nova.booting((app, store) => {
  app.component('index-tire-condition', IndexField)
  app.component('detail-tire-condition', DetailField)
  app.component('form-tire-condition', FormField)
  // app.component('preview-tire-condition', PreviewField)
})
