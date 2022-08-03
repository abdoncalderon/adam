var language = 'es'

import { messagesES } from './es/messages'
import { contentES } from './es/content'

switch(language){
case 'es':
    var messages=messagesES
    var content=contentES
} 

function trnsl(expression) {
    var attribs = expression.split('.')
    var type = attribs[0]
    var key = attribs[1]
   
    switch (type) {
        case 'content':
            return content[key]
        case 'messages':
            return messages[key]
        default:
            return expression
    }
}

export { trnsl }


    
      