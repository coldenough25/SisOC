import { Request, Response, NextFunction } from 'express';
import { verify } from 'jsonwebtoken';

import AppError from '@shared/errors/AppError';
import authConfig from '@config/auth';

interface ITokenPayload {
  iat: number;
  exp: number;
  subject: {
    id: number;
    tipo: string;
  };
}

export default function verifyAuthentication(
  request: Request,
  response: Response,
  next: NextFunction,
): void {
  const authHeader = request.headers.authorization;

  if (!authHeader) {
    throw new AppError('JWT token is missing', 401);
  }

  const [, token] = authHeader.split(' ');

  try {
    const decoded = verify(token, authConfig.jwt.secret);

    const { subject } = decoded as ITokenPayload;

    request.user = {
      id: subject.id,
      tipo: subject.tipo,
    };

    return next();
  } catch {
    throw new AppError('Invalid JWT token', 401);
  }
}
