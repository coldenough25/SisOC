import { container } from 'tsyringe';

import DiskStorage from './StorageProvider/implementations/DiskStorage';
import IStorageProvider from './StorageProvider/models/IStorageProvider';

import './MailTemplateProvider';
import './MailProvider';

container.registerSingleton<IStorageProvider>('StorageProvider', DiskStorage);
