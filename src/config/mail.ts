interface IMailConfig {
  driver: 'ethereal' | 'google';
}

export default {
  driver: process.env.MAIL_DRIVER || 'google',
} as IMailConfig;
