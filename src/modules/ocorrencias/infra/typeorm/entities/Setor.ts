import { Column, Entity, PrimaryGeneratedColumn } from 'typeorm';

@Entity('setor')
export default class Setor {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  sigla: string;

  @Column()
  nome: string;

  @Column()
  email: string;
}
