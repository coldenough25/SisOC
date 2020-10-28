import nodemailer, { Transporter } from 'nodemailer';
import { inject, injectable } from 'tsyringe';

import IMailProvider from '../models/IMailProvider';
import ISendMessageDTO from '../dtos/ISendMessageDTO';
import IMailTemplateProvider from '../../MailTemplateProvider/models/IMailTemplateProvider';

@injectable()
export default class GoogleMailProvider implements IMailProvider {
  private client: Transporter;

  constructor(
    @inject('MailTemplateProvider')
    private mailTemplateProvider: IMailTemplateProvider,
  ) {
    const transporter = nodemailer.createTransport({
      host: 'smtp.gmail.com',
      port: 587,
      requireTLS: true,
      auth: {
        user: process.env.EMAIL_USER || '',
        pass: process.env.EMAIL_PASS || '',
      },
    });

    this.client = transporter;
  }

  public async send({
    to,
    subject,
    from,
    templateData,
  }: ISendMessageDTO): Promise<void> {
    await this.client.sendMail({
      from: {
        name: from?.name || 'SISOC',
        address: from?.email || 'nao-responda@sisoc.xyz',
      },
      to: {
        name: to.name,
        address: to.email,
      },
      html: await this.mailTemplateProvider.parse(templateData),
      subject,
    });
  }
}
