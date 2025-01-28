from telegram import Update
from telegram.ext import Updater, CommandHandler, MessageHandler, Filters, CallbackContext

TOKEN = '7776645589:AAFMT1eXkMjO9Ue3QD8jVpQ0xXFG9d7Le6o'

def start(update: Update, context: CallbackContext) -> None:
    update.message.reply_text('Bonjour! Quel est ton nom?')

def handle_name(update: Update, context: CallbackContext) -> None:
    user_name = update.message.text
    update.message.reply_text(f'Bonjour, {user_name}!')

def main() -> None:
    updater = Updater(TOKEN, use_context=True)

    updater.dispatcher.add_handler(CommandHandler('start', start))
    updater.dispatcher.add_handler(MessageHandler(Filters.text & ~Filters.command, handle_name))

    updater.start_polling()
    updater.idle()

if __name__ == '__main__':
    main()
