const options = {
    bottom: '15rem', // default: '32px'
    right: '2rem', // default: '32px'
    left: 'unset', // default: 'unset'
    time: '0.5s', // default: '0.3s'
    mixColor: 'white', // default: '#fff'
    backgroundColor: '#F9F3E5',  // default: '#fff'
    buttonColorDark: '#100f2c',  // default: '#100f2c'
    buttonColorLight: '#F9F3E5', // default: '#fff'
    saveInCookies: true, // default: true,
    label: '🌓', // default: ''
    autoMatchOsTheme: false // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();


