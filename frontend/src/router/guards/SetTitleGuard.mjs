export function setTitle(to, from, next) {
  const appName = import.meta.env.VITE_APP_NAME
  const pageTitle = to.meta?.title || appName

  document.title = `${pageTitle} | ${appName}`
  next()
}
