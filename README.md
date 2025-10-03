# Laravel Message Package

[![Awesome](https://cdn.rawgit.com/sindresorhus/awesome/d7305f38d29fed78fa85652e3a63e154dd8e8829/media/badge.svg)](https://github.com/sindresorhus/awesome)
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![Made With Love](https://img.shields.io/badge/Made%20With-Love-orange.svg)](https://github.com/chetanraj/awesome-github-badges)
[![Laravel](https://img.shields.io/badge/Laravel-10%2B-red.svg)](https://laravel.com)

A powerful Laravel package for sending messages to multiple messaging platforms with an elegant fluent API.

## ✨ Features

- 🚀 **Easy Integration** - Simple Laravel package installation
- 💬 **Multiple Platforms** - Support for various messaging services
- 🎯 **Fluent API** - Elegant method chaining for message composition
- 📝 **Rich Formatting** - Bold text, lists, line breaks, and more
- ⚙️ **Auto Configuration** - Automatic chat ID detection for Telegram
- 🔒 **Secure** - Environment-based configuration

## 📋 Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher
- PHP ext-zip extension (for dependencies)

## 📦 Supported Platforms

- [Telegram](https://telegram.org/) ✅
- More platforms coming soon...

## 🚀 Installation

Install the package via Composer:

```bash
composer require ahmedgomaaeid/message
```

### Laravel Setup

The package will automatically register its service provider. If you need to register it manually, add to `config/app.php`:

```php
'providers' => [
    // Other providers...
    AhmedGomaaEid\Message\MessageServiceProvider::class,
],
```

## ⚙️ Configuration

### Telegram Configuration

1. **Add your bot token** to your `.env` file:
```env
TELEGRAM_BOT_TOKEN=your_telegram_bot_token_here
```

2. **Get your Chat ID** (First time setup):
   - Send any message to your Telegram bot
   - Visit: `https://your-app-url.com/telegram-chat-id-taker`
   - The chat ID will be automatically saved to your `.env` file

## 📖 Usage Examples

### 🔹 Basic Telegram Message

```php
use AhmedGomaaEid\Message\Classes\TelegramMessage;

$message = new TelegramMessage();
$message->addLine('Hello from Laravel!')
        ->addBoldText('This is bold text')
        ->send();
```

### 🔹 Rich Formatted Message

```php
use AhmedGomaaEid\Message\Classes\TelegramMessage;

$message = new TelegramMessage();

// Create a list of items
$todoList = [
    'Complete project documentation',
    'Review pull requests', 
    'Deploy to production',
    'Update team on progress'
];

$message->addBoldText('📋 Daily Tasks')
        ->addLine('Here are today\'s important tasks:')
        ->addList($todoList)
        ->addLine('')
        ->addLine('Please complete by end of day. 🎯')
        ->send();
```

### 🔹 System Notifications

```php
use AhmedGomaaEid\Message\Classes\TelegramMessage;

// Example: Order notification
$message = new TelegramMessage();
$message->addBoldText('🛒 New Order Received!')
        ->addLine('Order ID: #12345')
        ->addLine('Customer: John Doe')
        ->addLine('Amount: $199.99')
        ->addLine('Status: Processing')
        ->addLink('View Order', 'https://your-app-url.com/orders/12345')
        ->send();
```

### 🔹 Available Methods

```php
$message = new TelegramMessage();

// Text formatting
$message->addLine('Regular text line');
$message->addBoldText('Bold text');

// Lists
$message->addList(['Item 1', 'Item 2', 'Item 3']);

// Send the message
$message->send();
```

## 🛠️ Available Methods

| Method | Description | Example |
|--------|-------------|---------|
| `addLine($text)` | Add a regular text line | `->addLine('Hello World')` |
| `addBoldText($text)` | Add bold formatted text | `->addBoldText('Important!')` |
| `addList($array)` | Add a bulleted list | `->addList(['A', 'B', 'C'])` |
| `addListWithKeyValue($array)` | Add a list with key-value pairs | `->addListWithKeyValue(['Key1' => 'Value1', 'Key2' => 'Value2'])` |
| `addLink($text, $url)` | Add a hyperlink | `->addLink('Click Here', 'https://example.com')` |
| `send()` | Send the composed message | `->send()` |

## 🔧 Troubleshooting

### Common Issues

**1. "Bot token not configured" error:**
- Ensure `TELEGRAM_BOT_TOKEN` is set in your `.env` file
- Verify the token is correct (get it from [@BotFather](https://t.me/botfather))

**2. "Chat ID not found" error:**
- Visit `/telegram-chat-id-taker` to set up chat ID
- Make sure you've sent at least one message to your bot first

**3. Messages not sending:**
- Check your internet connection
- Verify bot token permissions
- Ensure chat ID is correct

### Getting Help

- Check the [Laravel Log](storage/logs/laravel.log) for detailed error messages
- Verify your `.env` configuration
- Test your bot token using Telegram's API directly

## 🎯 Use Cases

This package is perfect for:
- **System Notifications** - Server alerts, error notifications
- **Order Updates** - E-commerce order status updates  
- **Daily Reports** - Automated daily/weekly summaries
- **User Notifications** - Account updates, reminders
- **Marketing Messages** - Promotional campaigns
- **Team Communication** - Development team notifications

## 📝 License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 🙏 Credits

Created by [Ahmed Gomaa Eid](https://github.com/ahmedgomaaeid)


