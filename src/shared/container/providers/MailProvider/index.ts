import { container } from 'tsyringe';

import mailConfig from '@config/mail';

import IMailProvider from './models/IMailProvider';
import Ethereal from './implementations/EtherealMailProvider';
import Google from './implementations/GoogleMailProvider';

const providers = {
  ethereal: container.resolve(Ethereal),
  google: container.resolve(Google),
};

container.registerInstance<IMailProvider>(
  'MailProvider',
  providers[mailConfig.driver],
);
