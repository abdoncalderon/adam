var language = 'es'

import { messagesES } from './es/messages'
import { contentES } from './es/content'

switch(language){
  case 'es':
      var messages=messagesES
      var content=contentES
} 

export const trnsl = {
  messages: messages,
  content: content
}
    
      