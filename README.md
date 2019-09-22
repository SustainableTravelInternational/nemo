### Install

```shell script
npm install
```
### Test
```shell script
npm start
```

### Deploy

This would be the intended deployment, but Laravel sits in this public folder
too. The Laravel project needs to be configured to load this React app for 
non-admin routes.

```shell script
npm run build
cp --archive build/* ../nemobk/code/public
```