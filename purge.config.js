
module.exports = {
    plugins: [
      purgecss({
        content: [
            './storage/framework/views/*.php',
            './resources/**/*.blade.php',
        ]
      })
    ]
  }